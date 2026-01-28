CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE profiles (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    bio TEXT,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (pseudo, name, prenom, email, email_verified_at, password)
VALUES
('khaoulaK', 'Khoul', 'A', 'khaoula@example.com', NOW(), 'hashed_password1'),
('youssefM', 'Youssef', 'M', 'youssef@example.com', NOW(), 'hashed_password2'),
('aminaB', 'Amina', 'B', 'amina@example.com', NULL, 'hashed_password3');

INSERT INTO profiles (user_id, bio, photo)
VALUES
(1, 'Hello, I am Khaoula, j’adore coder.', 'khaoula.jpg'),
(2, 'Youssef ici, fan de foot et musique.', 'youssef.png'),
(3, 'Amina, passionnée par le design et la photo.', NULL);


select * from users;
select * from profiles;