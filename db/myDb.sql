CREATE TABLE users (
    id          SERIAL PRIMARY KEY,
    first_name  VARCHAR(20),
    last_name   VARCHAR(20),
    username    VARCHAR(20),
    password    VARCHAR(20),
    cart_id     INTEGER REFERENCES cart(id));

CREATE TABLE cart (
    id          SERIAL PRIMARY KEY);
    
CREATE TABLE categories (
    id          SERIAL PRIMARY KEY,
    title       VARCHAR(50),
    description VARCHAR(200));

CREATE TABLE products (
    id          SERIAL PRIMARY KEY,
    title       VARCHAR(20),
    description VARCHAR(200),
    image       VARCHAR(20),
    price       FLOAT(2),
    category_id INTEGER REFERENCES categories(id));
    
CREATE TABLE cart_product (
  cart_id    INTEGER REFERENCES cart(id) ON UPDATE CASCADE ON DELETE CASCADE,
  product_id INTEGER REFERENCES products(id) ON UPDATE CASCADE,
  amount     NUMERIC,
  CONSTRAINT cart_product_pkey PRIMARY KEY (cart_id, product_id)  -- explicit pk
);