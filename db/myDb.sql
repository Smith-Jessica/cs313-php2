CREATE TABLE users (
    id          SERIAL PRIMARY KEY,
    first_name  TEXT,
    last_name   TEXT,
    username    TEXT,
    password    TEXT);

CREATE TABLE cart (
    id          SERIAL PRIMARY KEY);
    
CREATE TABLE categories (
    id          SERIAL PRIMARY KEY,
    title       TEXT,
    description TEXT);

CREATE TABLE products (
    id          SERIAL PRIMARY KEY,
    title       TEXT,
    description TEXT,
    image       TEXT,
    price       FLOAT(2),
    category_id INTEGER REFERENCES categories(id),
    detail_pg   TEXT);
    
CREATE TABLE cart_product (
  cart_id    INTEGER REFERENCES cart(id) ON UPDATE CASCADE ON DELETE CASCADE,
  product_id INTEGER REFERENCES products(id) ON UPDATE CASCADE,
  amount     NUMERIC,
  CONSTRAINT cart_product_pkey PRIMARY KEY (cart_id, product_id)  -- explicit pk
);

CREATE TABLE orders (
order_id     SERIAL PRIMARY KEY,
cart_id      INTEGER REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
product_id   INTEGER REFERENCES products(id) ON UPDATE CASCADE,
quantity     NUMERIC);



INSERT INTO cart DEFAULT VALUES;
INSERT INTO users VALUES(DEFAULT,'test', 'user', 'test', 'test');

INSERT INTO categories VALUES(DEFAULT,'Hub', 'This is a category for all the different command hubs') RETURNING id;
INSERT INTO products VALUES(DEFAULT,'Google Home', 'This is Googles Command hub', 'hub.jpg', 129.00, 1, 'hub.php');
INSERT INTO products VALUES(DEFAULT,'Amazon Alexa Echo', 'This is Amazon Alexa, the Command hub', 'alexa.jpg', 149.00, 1, 'alexa.php');

INSERT INTO categories VALUES(DEFAULT,'Light', 'This is a category for everything lights') RETURNING id;
INSERT INTO products VALUES(DEFAULT,'Light', 'This is a smart light', 'light.jpg', 30.00, 2, 'light.php');

