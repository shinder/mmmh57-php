INSERT INTO
`address_book`
(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
 VALUES
('李小明2', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明3', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明4', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明5', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明6', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明7', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明8', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明9', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明10', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明11', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明12', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02'),
('李小明13', 'ming@gmail.com', '0918111222', '1990-05-07', '台南市', '2020-04-06 16:31:02');


UPDATE `address_book` SET `email` = 'ming123@gmail.com' WHERE `sid` = 5;
UPDATE `address_book` SET `email` = 'ming456@gmail.com';

SELECT `products`.*, `categories`.`name`
    FROM `products`
    JOIN `categories` ON `products`.`category_sid`=`categories`.`sid`
    WHERE `products`.`sid`=2;
