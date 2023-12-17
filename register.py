from flask import Flask, render_template, request, redirect
from flask_sqlalchemy import SQLAlchemy
import hashlib

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/login-bd'
db = SQLAlchemy(app)

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(90))
    surname = db.Column(db.String(50))
    email = db.Column(db.String(50), unique=True)
    pass_hash = db.Column(db.String(32))
    organization = db.Column(db.String(50))
    qualification = db.Column(db.String(50))

# Хэш-функция для пароля
def hash_password(password):
    return hashlib.md5(password.encode('utf-8') + "jhsdafjksdf1321".encode('utf-8')).hexdigest()

@app.route('/register', methods=['POST'])
def register():
    name = request.form['name-reg']
    surname = request.form['surname']
    email = request.form['email-reg']
    password = request.form['password-reg']
    organization = request.form['organization-reg']
    qualification = request.form['qualification']

    # Проверка длины полей
    if not (2 <= len(name) <= 90 and 3 <= len(surname) <= 50 and 3 <= len(email) <= 50 and 3 <= len(password) <= 50
            and 1 <= len(organization) <= 50 and 3 <= len(qualification) <= 50):
        return "Недопустимые длины полей"

    # Хэшируем пароль
    hashed_password = hash_password(password)

    # Создаем нового пользователя и добавляем в базу данных
    new_user = User(name=name, surname=surname, email=email, pass_hash=hashed_password,
                    organization=organization, qualification=qualification)
    db.session.add(new_user)
    db.session.commit()

    @app.route('/login.html')
    def login_page():
    # Возможно, вам здесь нужно провести некоторую логику, связанную с отображением страницы login.html
        return render_template('login.html')

if __name__ == '__main__':
    db.create_all()
    app.run(debug=True)
