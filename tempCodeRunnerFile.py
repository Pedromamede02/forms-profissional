import mysql.connector
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Configurações do banco de dados
db_config = {
    'user': 'root',
    'password': '',  # Substitua pela sua senha, se aplicável
    'host': 'localhost',
    'database': 'projeto',
    'raise_on_warnings': True
}

# Configurações de e-mail
email_config = {
    'smtp_server': 'smtp.gmail.com',
    'smtp_port': 587,
    'smtp_user': 'pedropepe181@gmail.com',
    'smtp_password': 'pwrnxdkeuljdphwb'  # Use sua senha de aplicativo aqui se a verificação em duas etapas estiver ativada
}

def enviar_email(destinatario, mensagem):
    msg = MIMEMultipart()
    msg['Subject'] = 'Resultado da Avaliação de Criatividade'
    msg['From'] = email_config['smtp_user']
    msg['To'] = destinatario
    msg.attach(MIMEText(mensagem, 'plain'))

    try:
        s = smtplib.SMTP(email_config['smtp_server'], email_config['smtp_port'])
        s.starttls()
        s.login(email_config['smtp_user'], email_config['smtp_password'])
        s.sendmail(msg['From'], [msg['To']], msg.as_string())
        s.quit()
        print('Email enviado')
    except smtplib.SMTPException as e:
        print(f'Erro ao enviar e-mail: {e}')

try:
    # Conecta ao banco de dados
    cnx = mysql.connector.connect(**db_config)
    cursor = cnx.cursor()

    # Consulta SQL
    query = """
    SELECT a.id_usuario,
           a.avaliacao1, a.avaliacao2, a.avaliacao3, a.avaliacao4,
           a.avaliacao5, a.avaliacao6, a.avaliacao7, a.avaliacao8,
           b.avaliacao9, b.avaliacao10, b.avaliacao11, b.avaliacao12,
           b.avaliacao13, b.avaliacao14, b.avaliacao15, b.avaliacao16, t.email
    FROM avaliacoes a
    JOIN avaliacoes2 b ON a.id_usuario = b.id_usuario
    JOIN tbusu t ON a.id_usuario = t.id
    ORDER BY b.data_submissao DESC
    LIMIT 1
    """
    cursor.execute(query)
    row = cursor.fetchone()

    if row:
        id_usuario, *avaliacoes, email_usuario, modelador, implementador, coordenador, trabalho_equipe, investigador, criativo, completador, inventor = row
        personalidade = (
            int(modelador) + int(implementador) + int(coordenador) + int(trabalho_equipe) + int(investigador) + int(criativo) + int(completador) + int(inventor)
            + int(avaliacoes[0]) + int(avaliacoes[8])  # PL - Criativo (perguntas 1 e 8)
            + int(avaliacoes[1]) + int(avaliacoes[9])  # CF - Completador Finalizador (perguntas 2 e 10)
            + int(avaliacoes[2]) + int(avaliacoes[10])  # PL - Criativo (perguntas 1 e 8)
            + int(avaliacoes[3]) + int(avaliacoes[11])  # CF - Completador Finalizador (perguntas 2 e 10)
            + int(avaliacoes[4]) + int(avaliacoes[12])  # PL - Criativo (perguntas 1 e 8)
            + int(avaliacoes[5]) + int(avaliacoes[13])  # CF - Completador Finalizador (perguntas 2 e 10)
            + int(avaliacoes[6]) + int(avaliacoes[14])  # PL - Criativo (perguntas 1 e 8)
            + int(avaliacoes[7]) + int(avaliacoes[15])  # CF - Completador Finalizador (perguntas 2 e 10)
        )

        # Monta a mensagem de e-mail com as características
        mensagem_email = f'Sua pontuação de criatividade é: {personalidade}\n\n'
        mensagem_email += f'IV - Modelador: {modelador}\n'
        mensagem_email += f'IM - Investigador de Implemento: {implementador}\n'
        mensagem_email += f'CO - Coordenador: {coordenador}\n'
        mensagem_email += f'TW - Trabalhador em Equipe: {trabalho_equipe}\n'
        mensagem_email += f'RI - Investigador de Recursos: {investigador}\n'
        mensagem_email += f'PL - Criativo (perguntas 1 e 8): {avaliacoes[0] + avaliacoes[8]}\n'
        mensagem_email += f'CF - Completador Finalizador (perguntas 2 e 10): {avaliacoes[1] + avaliacoes[9]}\n'
        mensagem_email += f'SH - Inventor: {inventor}\n'

        # Envia o resultado por e-mail para o usuário mais recente
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
