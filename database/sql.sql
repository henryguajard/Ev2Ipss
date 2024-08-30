-- pasar a activo el usuario para poder ingresar
UPDATE users SET activo =true WHERE id=2
-- proyecto creado
INSERT INTO proyectos (nombre, user_id, fecha_inicio, responsable, monto, created_at, updated_at) 
VALUES ('Proyecto de Ejemplo', 1, '2024-08-23', 'Juan Pérez', 5000, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
DROP TABLE IF EXISTS proyectos;