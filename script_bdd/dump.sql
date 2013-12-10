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

--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO utilisateur VALUES (44, 1, 'lucilleavec2l@hotmail.fr', 'lucilleavec2l@hotmail.fr', 'lucilleavec2l@hotmail.fr', 'lucilleavec2l@hotmail.fr', true, 'k4tbzvovheok8kgkkc0sg08cwk8gso8', 'OuUcuGh+ruFw3q7OyPEkOAan2UMMTmpxM7dMvKTYqPLyIwcC6GhioDuNJFVmKkFdQ9OpU5Q32cOsCZVCSJIblA==', '2013-12-10 14:33:26', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'dhaleine', 'lucille', 'toto');


--
-- Data for Name: Order; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart VALUES (1, 44);


--
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_id_seq', 1, true);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO product VALUES (1, 'Hunger Games', 'hunger-games', 'super film', '2013-12-10 11:17:35', 'video', NULL, '2013-12-10 11:17:35', '2013-12-10 11:17:36', NULL);


--
-- Data for Name: cart_item; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: cart_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_item_id_seq', 1, false);


--
-- Name: cart_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_product_id_seq', 1, false);


--
-- Data for Name: community; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO community VALUES (4, 'test', 'test', '2013-12-10 23:05:01', '2013-12-10 23:05:01');
INSERT INTO community VALUES (5, 'test1', 'test1', '2013-12-10 23:05:01', '2013-12-10 23:05:01');
INSERT INTO community VALUES (6, 'test2', 'test2', '2013-12-10 23:05:01', '2013-12-10 23:05:01');


--
-- Name: community_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('community_id_seq', 6, true);


--
-- Data for Name: communitysubscribing; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: communitysubscribing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('communitysubscribing_id_seq', 60, true);


--
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('order_id_seq', 1, false);


--
-- Data for Name: order_item; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('product_id_seq', 16, true);


--
-- Name: sylius_adjustment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_adjustment_id_seq', 1, false);


--
-- Name: sylius_exchange_rate_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_exchange_rate_id_seq', 1, false);


--
-- Name: sylius_option_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_option_id_seq', 1, false);


--
-- Name: sylius_option_value_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_option_value_id_seq', 1, false);


--
-- Name: sylius_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_product_id_seq', 46, true);


--
-- Data for Name: sylius_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sylius_property VALUES (1, 'price', 'Prix', 'number', 'a:0:{}', '2013-11-17 12:58:34', '2013-11-17 12:58:34');
INSERT INTO sylius_property VALUES (3, 'genre', 'Genre', 'text', 'a:0:{}', '2013-11-24 09:50:37', '2013-11-24 09:50:37');
INSERT INTO sylius_property VALUES (6, 'type', 'Type', 'text', 'a:0:{}', '2013-11-24 09:52:08', '2013-11-24 09:52:08');
INSERT INTO sylius_property VALUES (7, 'nbPistes', 'Nombre de pistes', 'number', 'a:0:{}', '2013-11-24 09:52:32', '2013-11-24 09:52:32');
INSERT INTO sylius_property VALUES (8, 'duree', 'Durée', 'number', 'a:0:{}', '2013-11-24 09:52:45', '2013-11-24 09:52:45');
INSERT INTO sylius_property VALUES (9, 'artiste', 'Artiste', 'text', 'a:0:{}', '2013-11-24 09:53:08', '2013-11-24 09:53:08');
INSERT INTO sylius_property VALUES (10, 'format', 'Format', 'text', 'a:0:{}', '2013-11-24 09:53:27', '2013-11-24 09:53:27');
INSERT INTO sylius_property VALUES (11, 'auteur', 'Auteur', 'text', 'a:0:{}', '2013-11-24 09:53:42', '2013-11-24 09:53:42');
INSERT INTO sylius_property VALUES (12, 'langue', 'Langue', 'text', 'a:0:{}', '2013-11-24 09:53:52', '2013-11-24 09:53:52');
INSERT INTO sylius_property VALUES (13, 'subLangue', 'Langue des sous-titres', 'text', 'a:0:{}', '2013-11-24 09:54:08', '2013-11-24 09:54:08');
INSERT INTO sylius_property VALUES (14, 'PEGI', 'PEGI', 'number', 'a:0:{}', '2013-11-24 09:54:24', '2013-11-24 09:54:24');
INSERT INTO sylius_property VALUES (15, 'plateforme', 'Plateforme', 'text', 'a:0:{}', '2013-11-24 09:54:37', '2013-11-24 09:54:37');
INSERT INTO sylius_property VALUES (16, 'quantite', 'Quantité', 'number', 'a:0:{}', '2013-11-24 09:54:50', '2013-11-24 09:54:50');
INSERT INTO sylius_property VALUES (17, 'dateEvent', 'Date de l''évènement', 'text', 'a:0:{}', '2013-11-24 09:55:28', '2013-11-24 09:55:28');
INSERT INTO sylius_property VALUES (18, 'lieu', 'Lieu', 'text', 'a:0:{}', '2013-11-24 09:55:38', '2013-11-24 09:55:38');
INSERT INTO sylius_property VALUES (19, 'image', 'Image', 'text', 'a:0:{}', '2013-11-24 10:03:28', '2013-11-24 10:03:28');


--
-- Data for Name: sylius_product_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sylius_product_property VALUES (299, 1, 1, '10');
INSERT INTO sylius_product_property VALUES (300, 1, 19, 'http://media.melty.fr/pmedia-1927780-ajust_610-f1385650268/hunger-games-succes-au-cinema.jpg');
INSERT INTO sylius_product_property VALUES (301, 1, 8, '150');
INSERT INTO sylius_product_property VALUES (302, 1, 3, 'aventure');
INSERT INTO sylius_product_property VALUES (303, 1, 6, 'film');
INSERT INTO sylius_product_property VALUES (304, 1, 12, 'français');
INSERT INTO sylius_product_property VALUES (305, 1, 10, 'avi');
INSERT INTO sylius_product_property VALUES (306, 1, 13, 'aucune');


--
-- Name: sylius_product_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_product_property_id_seq', 408, true);


--
-- Name: sylius_promotion_action_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_promotion_action_id_seq', 1, false);


--
-- Name: sylius_promotion_coupon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_promotion_coupon_id_seq', 1, false);


--
-- Name: sylius_promotion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_promotion_id_seq', 1, false);


--
-- Name: sylius_promotion_rule_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_promotion_rule_id_seq', 1, false);


--
-- Name: sylius_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_property_id_seq', 19, true);


--
-- Data for Name: sylius_prototype; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: sylius_prototype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_prototype_id_seq', 1, false);


--
-- Data for Name: sylius_prototype_property; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: sylius_variant_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_variant_id_seq', 1, true);


--
-- Data for Name: theme; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: theme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('theme_id_seq', 21, true);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('utilisateur_id_seq', 50, true);


--
-- PostgreSQL database dump complete
--

