--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: client_prospect; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE client_prospect (
    id integer NOT NULL,
    firstname character varying(30),
    name character varying(30),
    mail character varying(100)
);


ALTER TABLE public.client_prospect OWNER TO postgres;

--
-- Name: client_prospect_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE client_prospect_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.client_prospect_id_seq OWNER TO postgres;

--
-- Name: client_prospect_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE client_prospect_id_seq OWNED BY client_prospect.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY client_prospect ALTER COLUMN id SET DEFAULT nextval('client_prospect_id_seq'::regclass);


--
-- Name: client_prospect_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY client_prospect
    ADD CONSTRAINT client_prospect_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--
