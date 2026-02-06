CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    pseudo VARCHAR(50)  NOT NULL,
    name VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    bio TEXT,
    photo VARCHAR(255),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
select * from friend_requests where receiver_id=1;

INSERT INTO users (pseudo, name, prenom, email, email_verified_at, password)
VALUES
('khaoulaK', 'Khoul', 'A', 'khaoula@example.com', NOW(), 'hashed_password1'),
('youssefM', 'Youssef', 'M', 'youssef@example.com', NOW(), 'hashed_password2'),
('aminaB', 'Amina', 'B', 'amina@example.com', NULL, 'hashed_password3');

select * from posts ;
