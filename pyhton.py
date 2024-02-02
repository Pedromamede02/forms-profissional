import mysql.connector

config = {
    'user': 'root',
    'password': '',  # Substitua pela sua senha, se aplicável
    'host': 'localhost',
    'database': 'projeto',
    'raise_on_warnings': True
}

try:
    cnx = mysql.connector.connect(**config)
    cursor = cnx.cursor()

    query = """
    SELECT a.id_usuario,
           a.avaliacao1, a.avaliacao2, a.avaliacao3, a.avaliacao4,
           a.avaliacao5, a.avaliacao6, a.avaliacao7, a.avaliacao8,
           b.avaliacao9, b.avaliacao10, b.avaliacao11, b.avaliacao12,
           b.avaliacao13, b.avaliacao14, b.avaliacao15, b.avaliacao16
    FROM avaliacoes a
    JOIN avaliacoes2 b ON a.id_usuario = b.id_usuario
    """
    cursor.execute(query)
    
    for row in cursor:
        id_usuario = row[0]
        # Calcula a soma para "criatividade" somando avaliacao1 com avaliacao9
        criatividade = row[1] + row[9]
        
        # Imprime o resultado
        print(f"ID Usuário: {id_usuario}")
        print(f"Criatividade: {criatividade}")
        print("\n")

except mysql.connector.Error as err:
    print(f"Erro: {err}")

finally:
    if cnx.is_connected():
        cursor.close()
        cnx.close()
        print("Conexão ao MySQL foi encerrada")
