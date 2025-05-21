import pandas as pd

data = {
  "calories": [420, 380, 390],
  "duration": [50, 40, 45, 88, 999]
  
}

#load data into a DataFrame object:
df = pd.DataFrame(data)

print(df) 