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

CREATE TABLE orders (
  order_id   SERIAL PRIMARY KEY,
  cart_id    INTEGER REFERENCES cart(id) ON UPDATE CASCADE ON DELETE CASCADE,
  product_id INTEGER REFERENCES products(id) ON UPDATE CASCADE,
  amount     NUMERIC);


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
INSERT INTO products VALUES(DEFAULT,'Nest Thermostat 3rd Gen', 'The thermostat of all thermostats', 'nest3.jpg', 349.99, 2, 'nest3.php');
INSERT INTO products VALUES(DEFAULT,'Ring Video Doorbell', 'This is so you can spy on your neighbors', 'ring.jpg', 159.99, 2, 'ring.php');
INSERT INTO products VALUES(DEFAULT,'Sonos Beam - Smart TV Sound Bar', 'This is so you can jam all throughout the house. Or really scare your spouse.', 'sonos.jpg', 1599.90, 2, 'sonos.php');



INSERT INTO categories VALUES(DEFAULT,'Light', 'This is a category for everything lights') RETURNING id;
INSERT INTO products VALUES(DEFAULT,'Light', 'This is a smart light', 'light.jpg', 30.00, 2, 'light.php');

