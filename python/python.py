import mysql.connector
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Configurações do banco de dados
db_config = {
    'user': 'root',
    'password': '',  
    'host': 'localhost',
    'database': 'projeto',
    'raise_on_warnings': True
}

# Configurações de e-mail
email_config = {
    'smtp_server': 'smtp.gmail.com',
    'smtp_port': 587,
    'smtp_user': 'pedropepe181@gmail.com',
    'smtp_password': 'mwiwyiehvnasjlck'
}

def enviar_email(destinatario, mensagem):
    msg = MIMEMultipart()
    msg['Subject'] = 'Resultado da Avaliação de Personalidade'
    msg['From'] = email_config['smtp_user']
    msg['To'] = destinatario
    msg.attach(MIMEText(mensagem, 'plain'))
    
    try:
        s = smtplib.SMTP(email_config['smtp_server'], email_config['smtp_port'])
        s.starttls()
        s.login(email_config['smtp_user'], email_config['smtp_password'])
        s.sendmail(msg['From'], destinatario, msg.as_string())
        s.quit()
        print('Email enviado com sucesso.')
    except smtplib.SMTPException as e:
        print(f'Erro ao enviar e-mail: {e}')

try:
    cnx = mysql.connector.connect(**db_config)
    cursor = cnx.cursor()

    cursor.execute("""
    SELECT 
        u.email,
        a.avaliacao1, a.avaliacao2, a.avaliacao3, a.avaliacao4,
        a.avaliacao5, a.avaliacao6, a.avaliacao7, a.avaliacao8,
        b.avaliacao9, b.avaliacao10, b.avaliacao11, b.avaliacao12,
        b.avaliacao13, b.avaliacao14, b.avaliacao15, b.avaliacao16
    FROM tbusu u
    INNER JOIN avaliacoes a ON u.id = a.id_usuario
    INNER JOIN avaliacoes2 b ON u.id = b.id_usuario
    ORDER BY a.data_submissao DESC, b.data_submissao DESC
    LIMIT 1
    """)
    row = cursor.fetchone()

    if row:  # Este bloco deve estar indentado ao mesmo nível do try acima
        email_usuario, *avaliacoes = row
    modelador = avaliacoes[0] + avaliacoes[8]  # Avaliação 0 e 8
    implementador = avaliacoes[1] + avaliacoes[9]  # Avaliação 1 e 9
    coordenador = avaliacoes[2] + avaliacoes[10]  # Avaliação 2 e 10
    trabalho_equipe = avaliacoes[3] + avaliacoes[11]  # Avaliação 3 e 11
    investigador = avaliacoes[4] + avaliacoes[12]  # Avaliação 4 e 12
    criativo = avaliacoes[5] + avaliacoes[13]  # Avaliação 5 e 13
    completador = avaliacoes[6] + avaliacoes[14]  # Avaliação 6 e 14
    inventor = avaliacoes[7] + avaliacoes[15]  # Avaliação 7 e 15 (ajustar se necessário)

    # Preparando a mensagem de email com as pontuações
    mensagem_email = 'Resultado da Avaliação de Personalidade:\n\n'
    mensagem_email += f'Modelador: {modelador}\n'
    mensagem_email += f'Implementador: {implementador}\n'
    mensagem_email += f'Coordenador: {coordenador}\n'
    mensagem_email += f'Trabalho em Equipe: {trabalho_equipe}\n'
    mensagem_email += f'Investigador: {investigador}\n'
    mensagem_email += f'Criativo: {criativo}\n'
    mensagem_email += f'Completador: {completador}\n'
    mensagem_email += f'Inventor: {inventor}\n'

    print(mensagem_email) 
    enviar_email(email_usuario, mensagem_email)



except mysql.connector.Error as err:
    print(f"Erro MySQL: {err}")
except Exception as e:
    print(f"Erro: {e}")
finally:
    if 'cnx' in locals() and cnx.is_connected():
        cursor.close()
        cnx.close()
        print("Conexão ao MySQL foi encerrada")