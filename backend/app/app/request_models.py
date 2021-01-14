from pydantic import BaseModel
from datetime import date

class CreateAbsenceRequest(BaseModel):
    id: int
    koniec: date
    poczatek: date
