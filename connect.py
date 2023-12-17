import mysql.connector

# Устанавливаем соединение с базой данных
try:
    connection = mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='login-bd'
    )

    if connection.is_connected():
        print('Успешное подключение к базе данных')

except mysql.connector.Error as err:
    print(f'Ошибка подключения к базе данных: {err}')

