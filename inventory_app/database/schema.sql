CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    status ENUM('aktywny','nieaktywny') DEFAULT 'aktywny',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inventory_no VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(150) NOT NULL,
    serial_number VARCHAR(150),
    type VARCHAR(100),
    category VARCHAR(100),
    value DECIMAL(10,2),
    received_at DATE,
    status VARCHAR(50),
    location_id INT,
    employee_id INT,
    supplier_nip VARCHAR(20),
    invoice_number VARCHAR(50),
    warranty_end DATE,
    additional_data TEXT,
    attachment_path VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);
