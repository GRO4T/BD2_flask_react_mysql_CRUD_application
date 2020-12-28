from app import app

@app.route('/api/test')
def index():
    return { 'status': 'OK' }
