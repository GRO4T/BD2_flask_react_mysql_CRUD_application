import pathlib
from random import randint, choices
import hashlib
import string


def generator():
    names_m = []
    names_f = []
    lasts_m = []
    lasts_f = []
    with open(f"{pathlib.Path(__file__).parent}/data/names_m.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            names_m.append(x.split(",")[0])
    with open(f"{pathlib.Path(__file__).parent}/data/names_f.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            names_f.append(x.split(",")[0])
    with open(f"{pathlib.Path(__file__).parent}/data/lasts_m.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            lasts_m.append(x.split(",")[0])
    with open(f"{pathlib.Path(__file__).parent}/data/lasts_f.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            lasts_f.append(x.split(",")[0])

    email_domains = ["@gmail.com", "@wp.pl", "@onet.pl", "@hotmail.com",
                     "@outlook.com", "@o2.pl", "@interia.pl", "@yahoo.com"]

    account_counter = 1
    while True:
        employee = dict()

        sex = randint(0, 1)
        if sex == 0:
            employee["imie"] = names_m[randint(0, len(names_m)-1)].capitalize()
            employee["nazwisko"] = lasts_m[randint(0, len(lasts_m)-1)].capitalize()
        else:
            employee["imie"] = names_f[randint(0, len(names_f)-1)].capitalize()
            employee["nazwisko"] = lasts_f[randint(0, len(lasts_f)-1)].capitalize()

        employee["pesel"] = _generate_pesel()
        employee["email"] = f'{employee["imie"].lower()}.{employee["nazwisko"].lower()}.' \
                            f'{employee["pesel"][0:2]}{email_domains[randint(0, len(email_domains)-1)]}'
        employee["numer_telefonu"] = _generate_mobile()

        password = ''.join(choices(string.ascii_lowercase + string.digits, k=randint(8, 32)))
        account = {
            "nazwa_uzytkownika": employee["imie"][0].lower() + employee["nazwisko"].lower() + employee["pesel"][0:2],
            "haslo": hashlib.md5(password.encode("utf-8")).hexdigest()
        }
        employee['konto_uzytkownika_id'] = account_counter

        ret = [
            ("konto_uzytkownika", account),
            ("pracownik", employee)
        ]
        account_counter = account_counter + 1
        yield ret


def _generate_pesel():
    pesel = str(randint(50, 99)) + str(randint(1, 12)).zfill(2) \
            + str(randint(1, 28)).zfill(2) + str(randint(0, 99999)).zfill(5)
    return pesel


def _generate_mobile():
    mobile = str(randint(5, 8))
    for x in range(8):
        mobile = mobile + str(randint(0, 9))
    return mobile


if __name__ == "__main__":
    generator = generator()
    for i in range(100):
        print(next(generator))
