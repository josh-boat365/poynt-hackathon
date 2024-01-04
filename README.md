# poynt-hackathon
This is a an ecommerce api using Laravel 

# Api Schema 
## Products
    name
    price
    descript
    category

product_images
   product_id
   image

users
 name
 email
 phone_number
 password
 role


categories
 name
 image

orders
 user_id
 date
 status ( pending -- person has not paid
 	  proccessing -- person has paid
 	  completed -- person has recieved product
 	  cancelled )
 	  
  

order_items
	product_id
	quantity
	amount
	order_id

transactions
	description
	amount
	refference
	metadata - json
	user_id
	order
	status (pending, success, failed)

