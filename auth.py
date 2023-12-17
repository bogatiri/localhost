from flask import Flask, request, redirect, session
from flask_sqlalchemy import SQLAlchemy
import hashlib

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/login-bd'
app.secret_key = 'your_secret_key'  # Установите свой секретный ключ для сессий
db = SQLAlchemy(app)

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    surname = db.Column(db.String(50))
    email = db.Column(db.String(100), unique=True)
    pass_hash = db.Column(db.String(32))
    qualification = db.Column(db.String(50))
    theme = db.Column(db.String(50))

# Хэш-функция для пароля
def hash_password(password):
    return hashlib.md5(password.encode('utf-8') + "jhsdafjksdf1321".encode('utf-8')).hexdigest()

@app.route('/login', methods=['POST'])
def login():
    email = request.form['email-log']
    password = request.form['password-log']

    # Хэшируем пароль
    hashed_password = hash_password(password)

    # Ищем пользователя в базе данных
    user = User.query.filter_by(email=email, pass_hash=hashed_password).first()

    if not user:
        return "Пользователь не найден"

    # Устанавливаем данные сессии
    session['user_name'] = user.surname + ' ' + user.name
    session['user_qualification'] = user.qualification
    session['email'] = user.email

    if user.theme:
        session['theme'] = user.theme

    return redirect('/login.html')

if __name__ == '__main__':
    db.create_all()
    app.run(debug=True)
