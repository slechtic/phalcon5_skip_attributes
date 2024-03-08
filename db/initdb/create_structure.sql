CREATE DATABASE phalcon5_skip_attributes WITH ENCODING='UTF-8';

\c phalcon5_skip_attributes;

CREATE TABLE companies (
    id serial4 NOT NULL,
    name varchar(255),
    id_parent int,
    CONSTRAINT companies_pkey PRIMARY KEY (id),
    CONSTRAINT fk_parent_id FOREIGN KEY (id_parent) REFERENCES companies(id)
);

INSERT INTO companies (name) VALUES ('Company 1');
INSERT INTO companies (name, id_parent) VALUES ('Company 2', 1);

CREATE TABLE products (
    id serial4 NOT NULL,
    number varchar(255),
    id_company int4,
    CONSTRAINT products_pkey PRIMARY KEY (id),
	 CONSTRAINT fk_products_company
		FOREIGN KEY (id_company)
		REFERENCES companies(id)
);

INSERT INTO products (number, id_company) VALUES ('1', 2);

CREATE OR REPLACE VIEW v_products
AS SELECT p.id,
    p.number,
    'test' as extra_column,
    c.id_parent as id_parent_company
   FROM products p
   LEFT JOIN companies c on c.id = p.id_company;

