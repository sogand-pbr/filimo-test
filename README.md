# # Product Display and Recommendation System

## Overview
This project implements a system for displaying products and providing recommendations. The system is designed to handle a large number of products across various categories and is capable of responding to requests efficiently, even during peak traffic times. It offers three main APIs:

1. **Get Products**: Retrieve a list of products with various details such as name, price, category, and inventory. This API supports filtering based on categories, prices, and other features.
2. **Get a Product by Unique Identifier**: Retrieve complete information about a specific product using its unique identifier.
3. **Get Recommendations for a Product**: Retrieve a list of recommended products related to a specified product.

## Installation and Setup
1. Clone the repository from GitHub:
   ```
   git clone https://github.com/your/repository.git
   ```
2. Navigate to the project directory:
   ```
   cd repository
   ```
3. Install dependencies:
   ```
   npm install
   ```
4. Configure the environment variables as needed.

## Running the System
To start the server, run the following command:
```
npm start
```

## Testing
1. Load Testing: Use tools like Apache JMeter or k6 to simulate peak traffic and evaluate system performance.
2. Unit Testing: Run unit tests to ensure the functionality of each API endpoint.
   ```
   npm test
   ```

## API Documentation
### 1. Get Products (`/products`)
#### Description
Retrieves a list of products.
#### Method
GET
#### Parameters
- None
#### Response
- **200 OK**: Returns a JSON array of products.
- **404 Not Found**: If no products are found.

#### Example
Request:
```
GET /products
```
Response:
```json
[
  {
    "id": 1,
    "name": "Product A",
    "price": 20.99,
    "category": "Electronics",
    "inventory": 100
  },
  {
    "id": 2,
    "name": "Product B",
    "price": 10.49,
    "category": "Clothing",
    "inventory": 50
  }
]
```

### 2. Get a Product by Unique Identifier (`/products/:id`)
#### Description
Retrieves complete information about a product using its unique identifier.
#### Method
GET
#### Parameters
- `id` (integer): Unique identifier of the product.
#### Response
- **200 OK**: Returns a JSON object representing the product.
- **404 Not Found**: If the product with the specified ID is not found.

#### Example
Request:
```
GET /products/1
```
Response:
```json
{
  "id": 1,
  "name": "Product A",
  "description": "Lorem ipsum dolor sit amet.",
  "price": 20.99,
  "category": "Electronics",
  "inventory": 100,
  "images": ["image1.jpg", "image2.jpg"],
  "specifications": {"dimension": "10x5x3 inches", "weight": "1.5 lbs"}
}
```

### 3. Get Recommendations for a Product (`/products/:id/recommendations`)
#### Description
Retrieves a list of recommended products related to the specified product.
#### Method
GET
#### Parameters
- `id` (integer): Unique identifier of the product.
#### Response
- **200 OK**: Returns a JSON array of recommended products.
- **404 Not Found**: If no recommendations are found.

#### Example
Request:
```
GET /products/1/recommendations
```
Response:
```json
[
  {
    "id": 2,
    "name": "Product B",
    "price": 10.49,
    "category": "Clothing",
    "inventory": 50
  },
  {
    "id": 3,
    "name": "Product C",
    "price": 15.99,
    "category": "Electronics",
    "inventory": 30
  }
]
```

## Requests per second

![RPS](https://github.com/sogand-pbr/filimo-test/assets/110123392/7b44a1a7-da07-47a5-be3b-848ac56b6b9c)




