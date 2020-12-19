director_roles = ["Prezes zarządu", "Dyrektor finansowy", "Reprezentant inwestorów"]
departments = ["Dział HR", "Dział sprzedaży", "Dział reklamy", "Dział rozwoju", "Dział finansów", "Dział produkcji"]
number_of_groups = 10 * len(departments)
teams_per_group = 10
team_size = 6

def generate_hierarchy(data):
    start = 0
    end = len(director_roles)
    start, end = create_board_of_directors(data, start, end)
    start, end = create_departments(data, start, end)
    start, end = create_groups(data, start, end)
    start, end = create_teams(data, start, end)
    # assign_to_teams(data, start, end)
    return data

def create_board_of_directors(data, start, end):
    for i in range(start, end): # create board of directors
        board_member = {
            "nazwa_stanowiska": director_roles[i],
            "pracownik_id": i+1
        }
        data.append([("zarzad", board_member)])
    start = start + len(director_roles)
    end = end + len(departments)
    return start, end

def create_departments(data, start, end):
    for i in range(start, end): # create company departments
        dep_number = i - len(director_roles)
        dep_name = departments[dep_number]
        board_member_id = 1
        if dep_name == "Dział finansów":
            board_member_id = 2
        dep = {
            "nazwa": departments[dep_number],
            "zarzad_id": board_member_id,
            "kierownik_id": i+1
        }
        data.append([("dzial", dep)])
    start = start + len(departments)
    end = end + number_of_groups
    return start, end

def create_groups(data, start, end):
    for i in range(start, end): # create groups
        dep_id = (i % len(departments)) + 1
        group = {
            "nazwa": "Grupa" + str(i),
            "dzial_id": dep_id,
            "kierownik_id": i+1
        }
        data.append([("grupa", group)])
    start = start + number_of_groups
    end = end + number_of_groups * teams_per_group
    return start, end

def create_teams(data, start, end):
    for i in range(start, end): # create teams
        group_id = (i % number_of_groups) + 1
        team = {
            "nazwa": "Zespół" + str(i),
            "grupa_id": group_id,
            "kierownik_id": i+1
        }
        data.append([("zespol", team)])
    start = start + number_of_groups * teams_per_group
    end = len(data)
    return start, end
