import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

import React from 'react';
import { Link, usePage } from '@inertiajs/react';

const AvaliacaoIndex = ({ avaliacoes }) => {
    const { flash } = usePage().props;

    return (
        <AuthenticatedLayout>
    <div className="container mx-auto p-6">
            <h1 className="text-2xl font-bold mb-4">Lista de Avaliacaos</h1>

           {/*  {flash.message && (
                <div className="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {flash.message}
                </div>
            )} */}

            <Link
                href="/avaliacoes/create"
                className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
                Nova Avaliacao
            </Link>

            <table className="w-full mt-6 border">
                <thead>
                    <tr>
                        <th className="border px-4 py-2">ID</th>
                        <th className="border px-4 py-2">Tipo</th>
                        <th className="border px-4 py-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    {avaliacoes.data.map((avaliacao) => (
                        <tr key={avaliacao.id}>
                            <td className="border px-4 py-2">{avaliacao.id}</td>
                            <td className="border px-4 py-2">{avaliacao.tipo.nome}</td>
                            <td className="border px-4 py-2 space-x-2">
                                <Link
                                    href={`/avaliacoes/${avaliacao.id}/edit`}
                                    className="text-blue-500 hover:underline"
                                >
                                    Editar
                                </Link>
                                <Link
                                    as="button"
                                    method="delete"
                                    href={`/avaliacoes/${avaliacao.id}`}
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
                {avaliacoes.links.map((link, index) => (
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
        </AuthenticatedLayout>
    );
};

export default AvaliacaoIndex;
