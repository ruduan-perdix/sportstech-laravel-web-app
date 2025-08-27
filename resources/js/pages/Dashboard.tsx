import React, { useState } from "react";
import { useForm, router } from "@inertiajs/react";

interface Programme {
  id: number;
  name: string;
  description: string;
  duration: number;
  exercises?: { name: string; quantity: number }[];
}

interface Props {
  programmes: Programme[];
}

export default function Dashboard({ programmes }: Props) {
  const [showForm, setShowForm] = useState(false);
  const [editingId, setEditingId] = useState<number | null>(null);

  // Inertia form state
  const { data, setData, post, put, reset, errors } = useForm<{
    name: string;
    description: string;
    duration: number | string;
  }>({
    name: "",
    description: "",
    duration: "",
  });

  // Create
  const submit = (e: React.FormEvent) => {
    e.preventDefault();
    post("/programmes", {
      onSuccess: () => {
        reset();
        setShowForm(false);
      },
    });
  };

  // Update
  const update = (id: number, e: React.FormEvent) => {
    e.preventDefault();
    put(`/programmes/${id}`, {
      onSuccess: () => {
        reset();
        setEditingId(null);
      },
    });
  };

  // Delete
  const destroy = (id: number) => {
    if (confirm("Are you sure?")) {
      router.delete(`/programmes/${id}`);
    }
  };

  return (
    <div className="p-6 text-gray-900 dark:text-gray-100">
      <h1 className="text-5xl font-bold text-orange-500 mb-6 text-center">
        Trainer Dashboard
      </h1>

      {/* Toggle create form */}
      {!showForm && (
        <button
          onClick={() => setShowForm(true)}
          className="bg-orange-500 text-white px-4 py-2 rounded-lg shadow hover:bg-orange-600"
        >
          + Create New Programme
        </button>
      )}

      {/* Create Form */}
      {showForm && (
        <form
          onSubmit={submit}
          className="mt-6 p-4 bg-white dark:bg-gray-800 rounded-xl shadow space-y-4"
        >
          <div>
            <label className="block font-medium">Name</label>
            <input
              type="text"
              value={data.name}
              onChange={(e) => setData("name", e.target.value)}
              className="w-full border rounded p-2 text-black"
            />
            {errors.name && (
              <p className="text-red-600 text-sm">{errors.name}</p>
            )}
          </div>

          <div>
            <label className="block font-medium">Description</label>
            <textarea
              value={data.description}
              onChange={(e) => setData("description", e.target.value)}
              className="w-full border rounded p-2 text-black"
            />
            {errors.description && (
              <p className="text-red-600 text-sm">{errors.description}</p>
            )}
          </div>

          <div>
            <label className="block font-medium">Duration (days)</label>
            <input
              type="number"
              value={data.duration}
              onChange={(e) => setData("duration", e.target.value)}
              className="w-full border rounded p-2 text-black"
            />
            {errors.duration && (
              <p className="text-red-600 text-sm">{errors.duration}</p>
            )}
          </div>

          <div className="flex space-x-2">
            <button
              type="submit"
              className="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
            >
              Save
            </button>
            <button
              type="button"
              onClick={() => {
                reset();
                setShowForm(false);
              }}
              className="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500"
            >
              Cancel
            </button>
          </div>
        </form>
      )}

      {/* Programmes Table */}
      <div className="mt-8 overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <table className="w-full border-collapse">
          <thead>
  <tr className="bg-orange-500 text-white text-left">
    <th className="p-3 font-semibold">Name</th>
    <th className="p-3 font-semibold">Description</th>
    <th className="p-3 font-semibold">Duration</th>
    <th className="p-3 font-semibold">Exercises</th> {/* NEW */}
    <th className="p-3 font-semibold">Actions</th>
  </tr>
</thead>
<tbody>
  {programmes.map((programme) =>
    editingId === programme.id ? (
      // Inline edit row...
      <tr key={programme.id} className="border-b">
        {/* keep edit fields as is, skip exercises column */}
        <td className="p-3" colSpan={2}>
          {/* optional: leave exercises blank while editing */}
        </td>
      </tr>
    ) : (
      // Normal row
      <tr
        key={programme.id}
        className="border-b border-gray-300 dark:border-gray-600"
      >
        <td className="p-3 font-medium">{programme.name}</td>
        <td className="p-3">{programme.description}</td>
        <td className="p-3">{programme.duration} days</td>
        <td className="p-3">
          {programme.exercises && programme.exercises.length > 0 ? (
            <ul className="list-disc list-inside text-sm">
              {programme.exercises.map((exercise, idx) => (
                <li key={idx}>
                  {exercise.name} – {exercise.quantity}
                </li>
              ))}
            </ul>
          ) : (
            <span className="text-gray-500">No exercises</span>
          )}
        </td>
        <td className="p-3 space-x-2">
          <button
            onClick={() => {
              setEditingId(programme.id);
              setData({
                name: programme.name,
                description: programme.description,
                duration: programme.duration,
              });
            }}
            className="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
          >
            Edit
          </button>
          <button
            onClick={() => destroy(programme.id)}
            className="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
          >
            Delete
          </button>
        </td>
      </tr>
    )
  )}
</tbody>
        </table>
      </div>
    </div>
  );
}
