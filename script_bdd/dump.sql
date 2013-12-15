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
-- Data for Name: auser; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO auser VALUES (74, 'florian@gmail.com', 'florian@gmail.com', 'florian@gmail.com', 'florian@gmail.com', true, '8wh95t0a5c84gw8cwcoksso88c4gccc', '45Wjl+OdUo/vVogXRZx/bekiA7ax0HfIBJ8QWH+tjrPn8DOXnBBdqJQfD8odGwMCGKjruS1tcut8V/OKasjk/Q==', '2013-12-14 18:41:08', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (75, 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', true, 'jk7u0jqj9n48gwg88wcs4okc8ckoc0k', 'U4dsZJi6GIxnAb2WmknM7yEkm/0Hahk2UVR3Wv9soSxvTx4cwNaHPcvxdLkuPywz4zZg50ZvpcCyinjkwCt4QA==', '2013-12-14 18:36:04', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (72, 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', true, '8k4z5d8j568s44cogoc4k4g088ckwcs', 'MBrD2t7unSxKdkMSzEwynXiCGqQdZAkkS4w8p1HuXwmMNsFI0YZGIOoePjOiuPmutM3/9nXuioNlT64LbQdcJA==', '2013-12-14 18:36:20', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (73, 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', true, 'tqnzp44d0i8cog0sw08kw0swk088k8w', 'zbTXFWY0N59GljG3WFIcXMxbwQQc5fZbhnnrvYWsq2FmznLAL9E3Hjf7ShabfYkmGGFSZTxAHiu4mKaEitWI/Q==', '2013-12-14 18:37:53', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');


--
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: auser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auser_id_seq', 87, true);


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO utilisateur VALUES (73, NULL, 'Maia', 'Anthony', true, false);
INSERT INTO utilisateur VALUES (74, NULL, 'Licour', 'Florian', true, false);
INSERT INTO utilisateur VALUES (75, 5, 'Meresse', 'Lucie', true, false);
INSERT INTO utilisateur VALUES (72, 6, 'Dhaleine', 'Lucille', true, false);


--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart VALUES (5, 75);
INSERT INTO cart VALUES (6, 72);


--
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_id_seq', 6, true);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO product VALUES (74, 'Hunger Games', 'hunger-games', 'le film hunger games adapté du livre', '2013-12-14 18:30:01', 'video', NULL, '2013-12-14 18:30:01', '2013-12-14 18:30:01', NULL);
INSERT INTO product VALUES (75, 'Twilight Chapitre 1', 'twilight-chapitre-1', 'Le premier tome de la série twilight', '2013-12-14 18:32:08', 'book', NULL, '2013-12-14 18:32:08', '2013-12-14 18:32:08', NULL);
INSERT INTO product VALUES (76, 'XCOM Enemy Unknown', 'xcom-enemy-unknown', 'jeu de stratégie au tour par tour avec des aliens!', '2013-12-14 18:33:39', 'game', NULL, '2013-12-14 18:33:39', '2013-12-14 18:33:39', NULL);
INSERT INTO product VALUES (77, 'Lara Fabian - A Wonderful Life', 'lara-fabian-a-wonderful-life', 'le dernier album de lara fabian', '2013-12-14 18:35:36', 'music', NULL, '2013-12-14 18:35:36', '2013-12-14 18:35:36', NULL);


--
-- Data for Name: cart_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart_item VALUES (5, 77);


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

INSERT INTO community VALUES (18, 'test', 'test', '2013-12-15 03:28:41', '2013-12-15 03:28:41');
INSERT INTO community VALUES (19, 'test1', 'test1', '2013-12-15 03:28:41', '2013-12-15 03:28:41');
INSERT INTO community VALUES (20, 'test2', 'test2', '2013-12-15 03:28:41', '2013-12-15 03:28:41');
INSERT INTO community VALUES (21, 'lara fabian', 'lara-fabian', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (22, 'chanson française', 'chanson-française', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (23, 'rap', 'rap', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (24, 'J-pop', 'j-pop', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (25, 'animation', 'animation', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (26, 'films d''horreur', 'films-d''horreur', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (27, 'comédie romantique', 'comédie-romantique', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (28, 'martin scorsese', 'martin-scorsese', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (29, 'stratégie', 'stratégie', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (30, 'call of duty', 'call-of-duty', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (31, 'dota 2', 'dota-2', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (32, 'jeux indépendants', 'jeux-indépendants', '2013-12-14 18:40:27', '2013-12-14 18:40:27');


--
-- Name: community_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('community_id_seq', 32, true);


--
-- Data for Name: communitysubscribing; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO communitysubscribing VALUES (117, 21, 'theme', '44', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (118, 22, 'theme', '44', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (119, 23, 'theme', '44', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (120, 24, 'theme', '44', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (121, 25, 'theme', '45', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (122, 26, 'theme', '45', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (123, 27, 'theme', '45', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (124, 28, 'theme', '45', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (125, 29, 'theme', '46', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (126, 30, 'theme', '46', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (127, 31, 'theme', '46', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (128, 32, 'theme', '46', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (129, 21, 'user', '73', '2013-12-14 18:40:43', '2013-12-14 18:40:43');
INSERT INTO communitysubscribing VALUES (130, 24, 'user', '73', '2013-12-14 18:40:45', '2013-12-14 18:40:45');
INSERT INTO communitysubscribing VALUES (131, 32, 'user', '73', '2013-12-14 18:40:47', '2013-12-14 18:40:47');
INSERT INTO communitysubscribing VALUES (132, 21, 'user', '74', '2013-12-14 18:41:21', '2013-12-14 18:41:21');
INSERT INTO communitysubscribing VALUES (133, 28, 'user', '74', '2013-12-14 18:41:24', '2013-12-14 18:41:24');
INSERT INTO communitysubscribing VALUES (134, 29, 'user', '74', '2013-12-14 18:41:27', '2013-12-14 18:41:27');


--
-- Name: communitysubscribing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('communitysubscribing_id_seq', 134, true);


--
-- Data for Name: fournisseur; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('order_id_seq', 2, true);


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO orders VALUES (14, 72, '2013-12-14 18:36:55', 4598);


--
-- Data for Name: order_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO order_item VALUES (14, 75);
INSERT INTO order_item VALUES (14, 76);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('orders_id_seq', 14, true);


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('product_id_seq', 77, true);


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

INSERT INTO sylius_product_property VALUES (810, 74, 1, '999');
INSERT INTO sylius_product_property VALUES (811, 74, 19, 'http://media.melty.fr/pmedia-1927780-ajust_610-f1385650268/hunger-games-succes-au-cinema.jpg');
INSERT INTO sylius_product_property VALUES (812, 74, 8, '120');
INSERT INTO sylius_product_property VALUES (813, 74, 3, 'aventure');
INSERT INTO sylius_product_property VALUES (814, 74, 6, 'film');
INSERT INTO sylius_product_property VALUES (815, 74, 12, 'anglais');
INSERT INTO sylius_product_property VALUES (816, 74, 10, 'avi');
INSERT INTO sylius_product_property VALUES (817, 74, 13, 'français');
INSERT INTO sylius_product_property VALUES (818, 75, 1, '1599');
INSERT INTO sylius_product_property VALUES (819, 75, 19, 'http://www.lecture-academy.com/wp-content/uploads/2013/12/logo_11716.jpg');
INSERT INTO sylius_product_property VALUES (820, 75, 12, 'français');
INSERT INTO sylius_product_property VALUES (821, 75, 3, 'roman');
INSERT INTO sylius_product_property VALUES (822, 75, 6, 'livre');
INSERT INTO sylius_product_property VALUES (823, 75, 11, 'Stephanie Meyer');
INSERT INTO sylius_product_property VALUES (824, 75, 10, 'epub');
INSERT INTO sylius_product_property VALUES (825, 76, 1, '2999');
INSERT INTO sylius_product_property VALUES (826, 76, 19, 'http://i.jeuxactus.com/datas/jeux/x/c/xcom-enemy-unknown/xl/xcom-enemy-unknown-jaqu-502cd3c6355f0.jpg');
INSERT INTO sylius_product_property VALUES (827, 76, 3, 'stratégie');
INSERT INTO sylius_product_property VALUES (828, 76, 15, 'windows');
INSERT INTO sylius_product_property VALUES (829, 76, 14, '18+');
INSERT INTO sylius_product_property VALUES (830, 77, 1, '1299');
INSERT INTO sylius_product_property VALUES (831, 77, 19, 'http://static.fnac-static.com/multimedia/images_produits/ZoomPE/9/2/7/5099751516729.jpg');
INSERT INTO sylius_product_property VALUES (832, 77, 8, '60');
INSERT INTO sylius_product_property VALUES (833, 77, 3, 'chanson');
INSERT INTO sylius_product_property VALUES (834, 77, 7, '12');
INSERT INTO sylius_product_property VALUES (835, 77, 9, 'Lara Fabian');
INSERT INTO sylius_product_property VALUES (836, 77, 10, 'mp3');


--
-- Name: sylius_product_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_product_property_id_seq', 836, true);


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

INSERT INTO theme VALUES (44, 'Musique');
INSERT INTO theme VALUES (45, 'Cinéma');
INSERT INTO theme VALUES (46, 'Jeux vidéos');
INSERT INTO theme VALUES (47, 'Livres');
INSERT INTO theme VALUES (48, 'Spectacles');
INSERT INTO theme VALUES (49, 'Applications');

--
-- Name: theme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('theme_id_seq', 49, true);


--
-- Data for Name: user_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO user_order VALUES (72, 14);


--
-- Name: user_order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_order_id_seq', 6, true);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('utilisateur_id_seq', 50, true);


--
-- PostgreSQL database dump complete
--
