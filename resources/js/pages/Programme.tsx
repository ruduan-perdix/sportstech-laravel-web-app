import React from "react";

interface Programme {
  id: number;
  name: string;
  description: string;
  duration: number;
  excercises?: { name: string; quantity: number }[];
}

interface Props {
  programmes: Programme[];
}

export default function Programme({ programmes }: Props) {
  return (
    <div className="p-6 text-gray-900 dark:text-gray-100">

      <h1 className="text-5xl font-extrabold mb-8 text-center tracking-wide text-orange-600 !text-orange-600">
        SportsTech Training Programmes
      </h1>

      <div className="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <table className="w-full border-collapse">
          <thead>
            <tr className="bg-orange-500 text-white text-left">
              <th className="p-3 font-semibold">Name</th>
              <th className="p-3 font-semibold">Description</th>
              <th className="p-3 font-semibold">Duration</th>
              <th className="p-3 font-semibold">Exercises</th>
            </tr>
          </thead>
          <tbody>
            {programmes.map((programme) => (
              <tr
                key={programme.id}
                className="border-b border-gray-300 dark:border-gray-600"
              >
                <td className="p-3 font-medium">{programme.name}</td>
                <td className="p-3">{programme.description}</td>
                <td className="p-3">{programme.duration} days</td>
                <td className="p-3">
                  {programme.excercises ? (
                    <ul className="list-disc pl-5">
                      {programme.excercises.map((ex, idx) => (
                        <li key={idx}>
                          {ex.name} – {ex.quantity}
                        </li>
                      ))}
                    </ul>
                  ) : (
                    "No exercises"
                  )}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}