PGDMP                        |            sims    16.1    16.1 !    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16398    sims    DATABASE     {   CREATE DATABASE sims WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE sims;
                postgres    false            �            1259    17248 
   categories    TABLE     �   CREATE TABLE public.categories (
    id uuid NOT NULL,
    kategori character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.categories;
       public         heap    postgres    false            �            1259    17221 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    17220    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    17237    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    17236    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    219            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    218            �            1259    17255    products    TABLE     {  CREATE TABLE public.products (
    id uuid NOT NULL,
    kategori character varying(100) NOT NULL,
    nama_barang character varying(100) NOT NULL,
    harga_beli integer NOT NULL,
    harga_jual integer NOT NULL,
    stok_barang integer NOT NULL,
    image character(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    postgres    false            �            1259    17227    users    TABLE     H  CREATE TABLE public.users (
    id uuid NOT NULL,
    name character varying(255) NOT NULL,
    posisi character varying(255) NOT NULL,
    image character varying(255),
    password character varying(255) NOT NULL,
    token text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            +           2604    17224    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            ,           2604    17240    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219            �          0    17248 
   categories 
   TABLE DATA           J   COPY public.categories (id, kategori, created_at, updated_at) FROM stdin;
    public          postgres    false    220   L)       �          0    17221 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    216   �)       �          0    17237    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    219   V*       �          0    17255    products 
   TABLE DATA           �   COPY public.products (id, kategori, nama_barang, harga_beli, harga_jual, stok_barang, image, created_at, updated_at) FROM stdin;
    public          postgres    false    221   s*       �          0    17227    users 
   TABLE DATA           a   COPY public.users (id, name, posisi, image, password, token, created_at, updated_at) FROM stdin;
    public          postgres    false    217   �,       �           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
          public          postgres    false    215            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    218            9           2606    17252    categories categories_id_unique 
   CONSTRAINT     X   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_id_unique UNIQUE (id);
 I   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_id_unique;
       public            postgres    false    220            ;           2606    17254 %   categories categories_kategori_unique 
   CONSTRAINT     d   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_kategori_unique UNIQUE (kategori);
 O   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_kategori_unique;
       public            postgres    false    220            .           2606    17226    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            4           2606    17244 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    219            6           2606    17247 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    219            =           2606    17264    products products_id_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_id_unique UNIQUE (id);
 E   ALTER TABLE ONLY public.products DROP CONSTRAINT products_id_unique;
       public            postgres    false    221            ?           2606    17266 $   products products_nama_barang_unique 
   CONSTRAINT     f   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_nama_barang_unique UNIQUE (nama_barang);
 N   ALTER TABLE ONLY public.products DROP CONSTRAINT products_nama_barang_unique;
       public            postgres    false    221            0           2606    17233    users users_id_unique 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_unique UNIQUE (id);
 ?   ALTER TABLE ONLY public.users DROP CONSTRAINT users_id_unique;
       public            postgres    false    217            2           2606    17235    users users_name_unique 
   CONSTRAINT     R   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_name_unique UNIQUE (name);
 A   ALTER TABLE ONLY public.users DROP CONSTRAINT users_name_unique;
       public            postgres    false    217            7           1259    17245 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    219    219            @           2606    17258 "   products products_kategori_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_kategori_foreign FOREIGN KEY (kategori) REFERENCES public.categories(kategori);
 L   ALTER TABLE ONLY public.products DROP CONSTRAINT products_kategori_foreign;
       public          postgres    false    4667    221    220            �   s   x�m̱1 �:����q��� ���Aŋ�A�|{ŵ�E�8���RI�μ�UH�)�����X�"2b^�.T�گԂ��[��Xi4��I{���i��]�`�3��>J'�      �   w   x�]��
�0����a$ɺ��"j"�U�����`.����8�	,���R3l�JEK����뮜�O�q�״ �Z�$�m���x��#�|�����e]�?=�����Ǧ���%��jx;S      �      x������ � �      �   G  x����N�@���)�����~���RJK�*U������q���w!�<��L��>�:3�sc(W M �e������6I��Y�wHn������t���FIKX`_c�p5�����G�{}�=����'�������]�L�%P���*8+�:��ܖ<x��H8��b,%t���_��׉ح3�r˭��>��X�5�_�/7����#�~�-
*e7�
b�67\)@j��Ғ�:�X��}W��Y���094�Y�R��\TM5�.<�f	����?u�~�G���*��ڛl����Z�1�5ނMY;�K�_��9�]z&���[o����l.��^v���R���|��nV��i�.���%���P���l WT��.����F���IIWF�ݕ���fI�-�n'��B�]�B{����\ߕ�����g��⇲�Z�<GT�s�40�0�<����O}��6��� �]�T0��Q�r�as�"�Q��ԥ��r'�'�}����<�e��	�41c�g	�|[O����ܺ�A�M�"�=J^^%��Ml�#���պB�:qo�M7?����=]�
ae������?��q      �   �  x�U�˒�0����p��DqG"�$�� �TM@L��[M���ݬN���˩cs4�s��������t�4��)�̓���~����,?��muϚ�-�g;�ײ��(C4���޶^E�L�7fO�^�~N�╥�ul���|݋��kׄY�.�����&�:�[�q��{�}���d]s��a[�v����2M^-7(`�R�s��'K�w�5=l��A����aG�������"Q�ht�iTu�U�7�	e���YDm���[\��p��;?_�]Ư��;��P(��|�%aG{���t ��G����'mRH<,R�Q�k�yW��DRq�bɼ`I���u>aϒ�p�RR�Q�˻�i������nxJ��yA��׳y}%��-\G�Iy�y�*���d� �}@�����c��~MF��_9P��     