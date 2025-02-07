-- Crear la base de datos
CREATE DATABASE instituto;

-- Seleccionar la base de datos
USE instituto;

-- Crear tabla alumno
CREATE TABLE alumno (
    matricula VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    curso VARCHAR(20) NOT NULL
);

-- Crear tabla asignatura
CREATE TABLE asignatura (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Crear tabla alumno_asignatura
CREATE TABLE alumno_asignatura (
    matricula VARCHAR(20),
    codigo_asignatura INT,
    PRIMARY KEY (matricula, codigo_asignatura),
    FOREIGN KEY (matricula) REFERENCES alumno(matricula) ON DELETE CASCADE,
    FOREIGN KEY (codigo_asignatura) REFERENCES asignatura(codigo) ON DELETE CASCADE
);

-- Insertar datos en la tabla alumno
INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES
('A001', 'Juan', 'Pérez García', '1DAW'),
('A002', 'María', 'López Martínez', '1DAW'),
('A003', 'Carlos', 'Sánchez Fernández', '2DAW'),
('A004', 'Ana', 'Gómez Rodríguez', '2DAW'),
('A005', 'Luis', 'Hernández López', '1SMR'),
('A006', 'Sofía', 'Díaz Torres', '1SMR'),
('A007', 'Diego', 'Ruiz Sánchez', '2SMR'),
('A008', 'Paula', 'Jiménez Morales', '2SMR'),
('A009', 'Jorge', 'Ortiz Cruz', '1DAW'),
('A010', 'Lucía', 'Ramos Vega', '2DAW');

-- Insertar datos en la tabla asignatura
INSERT INTO asignatura (nombre) VALUES
('Base de datos'),
('Redes Locales'),
('Programacion'),
('Programacion en Entorno Servidor'),
('Diseño de interfaces'),
('Lenguaje de marcas'),
('Programacion en Entorno Cliente');

-- Asignar alumnos a asignaturas en la tabla alumno_asignatura
INSERT INTO alumno_asignatura (matricula, codigo_asignatura) VALUES
('A001', 1), ('A001', 2), ('A001', 3),
('A002', 1), ('A002', 4), ('A002', 5),
('A003', 2), ('A003', 6), ('A003', 7),
('A004', 3), ('A004', 4), ('A004', 5),
('A005', 6), ('A005', 7),
('A006', 1), ('A006', 2),
('A007', 3), ('A007', 4),
('A008', 5), ('A008', 6),
('A009', 7), ('A009', 1),
('A010', 2), ('A010', 3);
