

import numpy as np
import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.neural_network import MLPClassifier
from sklearn.metrics import accuracy_score

#Loading the dataset
data = pd.read_csv('data.csv')

#Splitting the dataset
X_train, X_test, y_train, y_test = train_test_split(data.drop(['label'], axis=1), data['label'], test_size=0.2, random_state=42)

#Normalizing the data
scaler = StandardScaler()
X_train_scaled = scaler.fit_transform(X_train)
X_test_scaled = scaler.transform(X_test)

#Building the AI Model
mlp = MLPClassifier(random_state=42, max_iter=2000, hidden_layer_sizes=(50,50))
mlp.fit(X_train_scaled, y_train)

#Making predictions
predictions = mlp.predict(X_test_scaled)

#Checking accuracy
accuracy = accuracy_score(y_test, predictions)
print(accuracy)

#Saving the model
import pickle

pickle.dump(mlp, open('model.pkl', 'wb'))

#Loading the model
model = pickle.load(open('model.pkl', 'rb'))

#Making predictions using the loaded model
predictions = model.predict(X_test_scaled)

#Checking accuracy
accuracy = accuracy_score(y_test, predictions)
print(accuracy)