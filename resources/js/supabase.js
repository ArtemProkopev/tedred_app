import { createClient } from "@supabase/supabase-js";

const supabaseUrl = import.meta.env.VITE_APP_SUPABASE_URL;
const supabaseKey = import.meta.env.VITE_APP_SUPABASE_KEY;

if (!supabaseUrl || !supabaseKey) {
    throw new Error("Supabase URL and Key must be defined in .env");
}

export const supabase = createClient(supabaseUrl, supabaseKey);
