import app.orm as orm
from pydantic_sqlalchemy import sqlalchemy_to_pydantic

Pracownik = sqlalchemy_to_pydantic(orm.Pracownik)
Dzial = sqlalchemy_to_pydantic(orm.Dzial)
