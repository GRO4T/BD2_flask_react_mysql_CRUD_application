from pydantic import BaseModel
from datetime import date

class CreateAbsenceRequest(BaseModel):
    id: int
    koniec: date
    poczatek: date

class GetPresentTimePeriodRequest(BaseModel):
    id_przelozonego: int
    poczatek: date
    koniec: date

class CreateSubRequest(BaseModel):
    id_nieobecnosci: int
    id_pracownika: int
