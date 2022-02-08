CREATE TABLE IF NOT EXISTS public.users
(
    id serial,
    name character varying(100) NOT NULL,
    email character varying(200) NOT NULL,
    password character varying(100) NOT NULL,
    created_at timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_user integer NOT NULL,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_user integer,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT uk_user_email UNIQUE (email),
    CONSTRAINT uk_user_name UNIQUE (name)
)
;
