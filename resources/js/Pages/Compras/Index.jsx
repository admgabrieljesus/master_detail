import React from 'react';
import { Link, usePage } from '@inertiajs/react';

const CompraIndex = ({ compras }) => {
    const { flash } = usePage().props;

    return (
        <div className="container mx-auto p-6">
            <h1 className="text-2xl font-bold mb-4">Lista de Compras</h1>

           {/*  {flash.message && (
                <div className="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {flash.message}
                </div>
            )} */}

            <Link
                href="/compras/create"
                className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
                Nova Compra
            </Link>

            <table className="w-full mt-6 border">
                <thead>
                    <tr>
                        <th className="border px-4 py-2">ID</th>
                        <th className="border px-4 py-2">Nome</th>
                        <th className="border px-4 py-2">Data</th>
                        <th className="border px-4 py-2">Valor Total</th>
                        <th className="border px-4 py-2">Itens</th>
                        <th className="border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {compras.data.map((compra) => (
                        <tr key={compra.id}>
                            <td className="border px-4 py-2">{compra.id}</td>
                            <td className="border px-4 py-2">{compra.nome}</td>
                            <td className="border px-4 py-2">{compra.data}</td>
                            <td className="border px-4 py-2">R$ {compra.valor_total}</td>
                            <td className="border px-4 py-2">
                                <ul className="list-disc pl-5">
                                    {compra.itens.map((item, index) => (
                                        <li key={index}>
                                            Produto ID: {item.produto_id}, Quantidade: {item.quantidade}, Valor: R$ {item.valor}
                                        </li>
                                    ))}
                                </ul>
                            </td>
                            <td className="border px-4 py-2 space-x-2">
                                <Link
                                    href={`/compras/${compra.id}/edit`}
                                    className="text-blue-500 hover:underline"
                                >
                                    Editar
                                </Link>
                                <Link
                                    as="button"
                                    method="delete"
                                    href={`/compras/${compra.id}`}
                                    className="text-red-500 hover:underline"
                                >
                                    Excluir
                                </Link>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>

            {/* Paginação */}
            <div className="mt-4 flex justify-between">
                {compras.links.map((link, index) => (
                    <Link
                        key={index}
                        href={link.url}
                        className={`px-4 py-2 rounded ${
                            link.active ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'
                        }`}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                    />
                ))}
            </div>
        </div>
    );
};

export default CompraIndex;
