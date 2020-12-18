#!/usr/bin/python3

import generators.generators as generators


def main():
    print("Hello world from initializer")
    data = generators.generate_accounts_and_employees(10)
    print(data)


if __name__ == "__main__":
    main()
