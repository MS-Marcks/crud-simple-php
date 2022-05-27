DELIMITER  $$
CREATE PROCEDURE `sp_create_product` (
in pname VARCHAR(256),
in pprecio DECIMAL(10,2),
in pexistencia INTEGER
)
BEGIN
   INSERT INTO productos (`nombre`,precio,existencia) VALUES (pname,pprecio,pexistencia);
END$$

DELIMITER $$
CREATE PROCEDURE `sp_search_product` ()
BEGIN
   SELECT id,nombre,precio,existencia FROM productos;
END$$

DELIMITER $$
CREATE PROCEDURE `sp_search_product_single` (IN pid INTEGER)
BEGIN
   SELECT id,nombre,precio,existencia FROM productos WHERE id=pid;
END$$
DELIMITER  $$
CREATE PROCEDURE `sp_update_product` (
IN pid INTEGER,
in pname VARCHAR(256),
in pprecio DECIMAL(10,2),
in pexistencia INTEGER
)
BEGIN
    UPDATE productos SET `nombre`=pname,precio=pprecio,existencia=pexistencia WHERE id = pid;
END$$

DELIMITER $$
CREATE PROCEDURE `sp_delete_product` (
in pid INTEGER)
BEGIN
   DELETE FROM productos WHERE id = pid;
END$$