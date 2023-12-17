from flask import Flask, redirect, make_response

app = Flask(__name__)

@app.route('/logout')
def logout():
    # Удаляем куки пользователя
    response = make_response(redirect('/login'))
    response.set_cookie('user', '', expires=0, path='/')
    
    # Выводим сообщение с использованием JavaScript
    alert_script = '<script>alert("sadkflsakdhfjlk");</script>'
    response.set_data(alert_script)
    
    return response

if __name__ == '__main__':
    app.run(debug=True)
