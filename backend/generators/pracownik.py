from random import randint, choices
import hashlib
import string


def generator():
    names_m = []
    names_f = []
    lasts_m = []
    lasts_f = []
    with open("./data/names_m.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            names_m.append(x.split(",")[0])
    with open("./data/names_f.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            names_f.append(x.split(",")[0])
    with open("./data/lasts_m.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            lasts_m.append(x.split(",")[0])
    with open("./data/lasts_f.csv", encoding="utf_8") as f:
        data = f.read().splitlines()
        for x in data:
            lasts_f.append(x.split(",")[0])

    email_domains = ["@gmail.com", "@wp.pl", "@onet.pl", "@hotmail.com",
                     "@outlook.com", "@o2.pl", "@interia.pl", "@yahoo.com"]

    while True:
        employee = dict()

        sex = randint(0, 1)
        if sex == 0:
            employee["name"] = names_m[randint(0, len(names_m)-1)].capitalize()
            employee["last"] = lasts_m[randint(0, len(lasts_m)-1)].capitalize()
        else:
            employee["name"] = names_f[randint(0, len(names_f)-1)].capitalize()
            employee["last"] = lasts_f[randint(0, len(lasts_f)-1)].capitalize()

        employee["pesel"] = generate_pesel()
        employee["email"] = f'{employee["name"].lower()}.{employee["last"].lower()}.' \
                            f'{employee["pesel"][0:2]}{email_domains[randint(0, len(email_domains)-1)]}'
        employee["mobile"] = generate_mobile()

        password = ''.join(choices(string.ascii_lowercase + string.digits, k=randint(8, 32)))
        account = {
            "username": employee["name"][0].lower() + employee["last"].lower() + employee["pesel"][0:2],
            "password": hashlib.md5(password.encode("utf-8")).hexdigest()
        }

        yield employee, account


def generate_pesel():
    pesel = str(randint(50, 99)) + str(randint(1, 12)).zfill(2) \
            + str(randint(1, 28)).zfill(2) + str(randint(0, 99999)).zfill(5)
    return pesel


def generate_mobile():
    mobile = str(randint(5, 8))
    for x in range(8):
        mobile = mobile + str(randint(0, 9))
    return mobile


if __name__ == "__main__":
    generator = generator()
    for i in range(100):
        print(next(generator))
