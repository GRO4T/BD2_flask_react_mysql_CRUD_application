from flask import Flask
from flask_sqlalchemy import SQLAlchemy
import os

DB_USERNAME, DB_PASSWORD, DB_DATABASE = os.environ['DB_USERNAME'], os.environ['DB_PASSWORD'], os.environ['DB_DATABASE']

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://{}:{}@db/{}'.format(DB_USERNAME, DB_PASSWORD, DB_DATABASE)
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

app.config['SECRET_KEY'] = 'admin123'
app.config['JWT_AUTH_URL_RULE'] = "/api/auth"

db = SQLAlchemy(app)

from sqlalchemy.orm import sessionmaker

Session = sessionmaker(bind=db.engine, autocommit=False)
session = Session()

from app import routes
