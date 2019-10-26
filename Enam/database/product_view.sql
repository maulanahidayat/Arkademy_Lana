CREATE OR REPLACE VIEW product_view AS
SELECT product.*,
       category.name as 'category'
FROM db_maulana_enam.product as product
         LEFT JOIN db_maulana_enam.category as category ON category.id = product.id_category
