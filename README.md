<h1 align="center"> 🚧 Projeto em construção 🚧 </h1>
----
# 🛠️ Abrir e rodar o projeto
### **Após baixar o projeto siga as seguintes estruções.**
* **Instale todas as dependências do projeto:**
  ````
    composer install
  ````


* **Gere uma APP_KEY:**
  ````
    php artisan key:generate
  ````


* **Gere uma Secret Key para o funcionamento do JWT:**
  ````
    php artisan jwt:secret
  ````


* **Por fim rode as migrates no banco configurado no .env:**
  ````
  php artisan migrate
  ````
****

# Rotas
># Auth
>## ``POST`` /api/login
>> ### Espera:
>>> { "email": " ", "password": " " }
>> ### Em casos de sucesso, retorna: 
>>>{ "access_token": " ", "token_type": "bearer" }
>## ``GET`` /api/logout
>> ### Em casos de sucesso, retorna:
>>>{"message" : "Successfully logged out"}

># User
>## ``POST`` /api/user/create 
>> ### Espera:
>>> { "name": " ", "email": " ", "password": " " }
>> ### Em casos de sucesso, retorna:
>>>{ "Code" : 200, "Message" : "User has been created successfully."
>## ``PUT`` /api/user/update
>> ### Espera ( Apenas o ID é obrigatório. ):
>>> /api/user/update?id= &name= &email= &password=
>> ### Em casos de sucesso, retorna:
>>>{ "Code" : 200, "Message" : "User  successfully updated."
>## ``DELETE`` /api/user/delete
>> ### Espera:
>>> /api/user/delete?id= 
>> ### Em casos de sucesso, retorna:
>>>{ "Code" : 200, "Message" : "User successfully deleted."
>## ``GET`` /api/user/read
>> ### Espera:
>>> /api/user/read?id=
>> ### Em casos de sucesso, retorna:
>>>{ 'id' : id, 'name' : name, 'email' : email }

****

# Autores
| [<img src="https://avatars.githubusercontent.com/u/59292351?s=96&v=4" width=115><br><sub>Arthur Vassoler</sub>](https://github.com/Arthur-Vassoler) | [<img src="https://avatars.githubusercontent.com/u/80574001?v=4" width=115><br><sub>Pedro Poglia</sub>](https://github.com/Poglia) |
|:---------------------------------------------------------------------------------------------------------------------------------------------------:|:----------------------------------------------------------------------------------------------------------------------------------:|