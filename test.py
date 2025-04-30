import pandas as pd

foo = {'name': 'Sven Schrodt', 'hobby': 'solving world problems', 'dob': '1970-12-09'}
foo2 = pd.read_json('data/customers_small_db.json')
# bar =pd.DataFrame(data=foo)

print(foo2)