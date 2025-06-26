--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-06-26 10:29:07

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16389)
-- Name: editoras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.editoras (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    cidade character varying(100),
    estado character varying(50)
);


ALTER TABLE public.editoras OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16388)
-- Name: editoras_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.editoras_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.editoras_id_seq OWNER TO postgres;

--
-- TOC entry 4911 (class 0 OID 0)
-- Dependencies: 217
-- Name: editoras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.editoras_id_seq OWNED BY public.editoras.id;


--
-- TOC entry 220 (class 1259 OID 16396)
-- Name: livros; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.livros (
    id integer NOT NULL,
    titulo character varying(150) NOT NULL,
    autor character varying(100) NOT NULL,
    ano_publicacao integer,
    estoque integer DEFAULT 0,
    id_editora integer,
    CONSTRAINT livros_ano_publicacao_check CHECK ((ano_publicacao >= 0)),
    CONSTRAINT livros_estoque_check CHECK ((estoque >= 0))
);


ALTER TABLE public.livros OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16395)
-- Name: livros_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.livros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.livros_id_seq OWNER TO postgres;

--
-- TOC entry 4912 (class 0 OID 0)
-- Dependencies: 219
-- Name: livros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.livros_id_seq OWNED BY public.livros.id;


--
-- TOC entry 4747 (class 2604 OID 16392)
-- Name: editoras id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.editoras ALTER COLUMN id SET DEFAULT nextval('public.editoras_id_seq'::regclass);


--
-- TOC entry 4748 (class 2604 OID 16399)
-- Name: livros id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.livros ALTER COLUMN id SET DEFAULT nextval('public.livros_id_seq'::regclass);


--
-- TOC entry 4903 (class 0 OID 16389)
-- Dependencies: 218
-- Data for Name: editoras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.editoras (id, nome, cidade, estado) FROM stdin;
1	Editora Brasil	Recife	PE
2	Novo Mundo	São Paulo	SP
3	Saraiva	São Paulo	SP
\.


--
-- TOC entry 4905 (class 0 OID 16396)
-- Dependencies: 220
-- Data for Name: livros; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.livros (id, titulo, autor, ano_publicacao, estoque, id_editora) FROM stdin;
1	Harry Potter e a pedra filosofal	J.K Howling	2002	23	3
\.


--
-- TOC entry 4913 (class 0 OID 0)
-- Dependencies: 217
-- Name: editoras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.editoras_id_seq', 3, true);


--
-- TOC entry 4914 (class 0 OID 0)
-- Dependencies: 219
-- Name: livros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.livros_id_seq', 1, true);


--
-- TOC entry 4753 (class 2606 OID 16394)
-- Name: editoras editoras_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.editoras
    ADD CONSTRAINT editoras_pkey PRIMARY KEY (id);


--
-- TOC entry 4755 (class 2606 OID 16404)
-- Name: livros livros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.livros
    ADD CONSTRAINT livros_pkey PRIMARY KEY (id);


--
-- TOC entry 4756 (class 2606 OID 16405)
-- Name: livros fk_editora; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.livros
    ADD CONSTRAINT fk_editora FOREIGN KEY (id_editora) REFERENCES public.editoras(id) ON DELETE SET NULL;


-- Completed on 2025-06-26 10:29:07

--
-- PostgreSQL database dump complete
--

