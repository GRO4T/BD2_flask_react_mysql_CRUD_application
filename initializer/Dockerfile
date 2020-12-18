FROM python:3.7-alpine

COPY requirements.txt /app/requirements.txt
RUN pip3 install -r /app/requirements.txt
COPY ./app /app

ENTRYPOINT ["python3", "/app/main.py"]
