
CREATE TABLE IF NOT EXISTS public.todos
(
    id serial,
    name character varying(200) NOT NULL,
    content text NOT NULL,
    tag character varying(200) NOT NULL,
    created_at timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_user integer NOT NULL,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_user integer,
    CONSTRAINT todos_pkey PRIMARY KEY (id)
)
;
