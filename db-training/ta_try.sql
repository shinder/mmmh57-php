-- 變更敘述結束符號為 // 主要是為了建立預存程序
DELIMITER //
-- 建立預存程序 (Stored Procedures)
CREATE PROCEDURE TA_TRY(IN p1_id INT, IN p2_id INT)
BEGIN
    START TRANSACTION;
    -- 為了測試，先將金額加入
    UPDATE products SET price=price+500 WHERE product_id=p2_id;
    -- 在「預存程序」裡才能使用 IF/ELSE
    IF (SELECT price>=500 FROM products WHERE product_id=p1_id) THEN
        -- 餘額足夠時
        UPDATE products SET price=price-500 WHERE product_id=p1_id;
        -- 另外記錄過程的敘述
        COMMIT; -- 提交
    ELSE
        SELECT '餘額不足' message;
        ROLLBACK;  -- 回復交易前狀態
    END IF;
END //
-- 回復敘述結束符號為 ;
DELIMITER ;

-- 呼叫時使用 CALL TA_TRY(23, 22);
