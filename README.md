
# test-api

### Run

You should have php v 7.    
Please open your CLI and run php -S

### API Doc

For testing you should use Postman. Also you can use curl.  
Auth header is required.

Test auth credentials  
login: root  
password: root

###### HEADERS  
1. Authorization - login:password in base64
```javascript
{
    "Authorization": "Basic bG9naW46cGFzc3dvcmQ="
}
```

###### Response
1. id - unique id  
2. title - name of toys  
3. price - price of toys  
4. color - color of toys  

###### Erorrs
1. messages

```javascript
{
    "message": "Controller not found"
}
```

###### GET /toy/ - Get all toys  
Response example:  

```javascript
[
    {
        "id": 1,
        "title": "bear",
        "price": 9.99,
        "color": "brown"
    },
    {
        "id": 2,
        "title": "rabbit",
        "price": 5.99,
        "color": "grey"
    },
    {
        "id": 3,
        "title": "fox",
        "price": 7.55,
        "color": "white"
    },
    {
        "id": 4,
        "title": "wolf",
        "price": 10.35,
        "color": "black"
    }
]
``` 

###### GET /toy/id - Get toy by id 
Response example:  
1. id - unique id  
2. title - name of toys  
3. price - price of toys  
4. color - color of toys  
```javascript
 {
        "id": 1,
        "title": "bear",
        "price": 9.99,
        "color": "brown"
 }
``` 