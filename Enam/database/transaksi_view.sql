CREATE OR REPLACE VIEW transaksi_view AS
SELECT transaksi.*,
       product.name,
       product.price,
       product.id_category,
       category.name as 'category',
       cashier.name  as 'cashier'
FROM db_maulana_enam.transaksi as transaksi
         LEFT JOIN db_maulana_enam.product as product ON product.id = transaksi.id_product
         LEFT JOIN db_maulana_enam.category as category ON category.id = product.id_category
         LEFT JOIN db_maulana_enam.cashier as cashier ON cashier.id = transaksi.id_cashier
