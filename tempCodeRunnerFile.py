def enviar_email(destinatario, criatividade):
    msg = MIMEMultipart()
    msg['Subject'] = 'Resultado da Avaliação de Criatividade'
    msg['From'] = email_config['smtp_user']
    msg['To'] = destinatario
    corpo_email = f'Sua pontuação de criatividade é: {criatividade}'
    msg.attach(MIMEText(corpo_email, 'html'))

    s = smtplib.SMTP(email_config['smtp_server'], email_config['smtp_port'])
    s.starttls()
    s.login(email_config['smtp_user'], email_config['smtp_password'])
    s.sendmail(msg['From'], [msg['To']], msg.as_string().encode('utf-8'))
    s.quit()
    print('Email enviado')

try:
    cnx = mysql.connector.connect(**config)
    cursor = cnx.cursor()

    # Modificada para selecionar apenas o registro mais recente
    query = """
    SELECT a.id_usuario,
           a.avaliacao1, a.avaliacao2, a.avaliacao3, a.avaliacao4,
           a.avaliacao5, a.avaliacao6, a.avaliacao7, a.avaliacao8,
           b.avaliacao9, b.avaliacao10, b.avaliacao11, b.avaliacao12,
           b.avaliacao13, b.avaliacao14, b.avaliacao15, b.avaliacao16, t.email
    FROM avaliacoes a
    JOIN avaliacoes2 b ON a.id_usuario = b.id_usuario
    JOIN tbusu t ON a.id_usuario = t.id
    ORDER BY b.data_submissao DESC  -- Assumindo que existe essa coluna
    LIMIT 1
    """
    cursor.execute(query)
    row = cursor.fetchone()  # Agora usando fetchone() para pegar apenas um registro
    
    if row:
        id_usuario, *avaliacoes, email_usuario = row
        criatividade = avaliacoes[0] + avaliacoes[8]
        
        # Envia o resultado por e-mail para o usuário mais recente
        enviar_email(email_usuario, criatividade)