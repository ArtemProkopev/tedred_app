<template>
    <div class="news-resource">
      <h2>{{ editing ? 'Edit News' : 'Create News' }}</h2>
      
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="title">Title</label>
          <input
            id="title"
            v-model="form.title"
            type="text"
            required
            placeholder="News title"
          >
        </div>
  
        <div class="form-group">
          <label for="subtitle">Subtitle</label>
          <input
            id="subtitle"
            v-model="form.subtitle"
            type="text"
            placeholder="News subtitle"
          >
        </div>
  
        <div class="form-group">
          <label for="date">Date</label>
          <input
            id="date"
            v-model="form.date"
            type="date"
          >
        </div>
  
        <div class="form-group">
          <label>News Image</label>
          <ImageUploader
            :news-id="form.id"
            :initial-image="form.image_url"
            button-text="Upload News Image"
            @upload-success="handleImageUpload"
            @image-removed="handleImageRemove"
          />
        </div>
  
        <div class="form-group">
          <label for="description_first">First Description</label>
          <textarea
            id="description_first"
            v-model="form.description_first"
            rows="4"
            placeholder="First part of news description"
          ></textarea>
        </div>
  
        <div class="form-group">
          <label for="description_second">Second Description</label>
          <textarea
            id="description_second"
            v-model="form.description_second"
            rows="4"
            placeholder="Second part of news description"
          ></textarea>
        </div>
  
        <div class="form-actions">
          <button type="submit" class="submit-btn">
            {{ editing ? 'Update' : 'Create' }}
          </button>
          <button
            v-if="editing"
            type="button"
            class="cancel-btn"
            @click="cancelEdit"
          >
            Cancel
          </button>
        </div>
      </form>
  
      <div v-if="loading" class="loading-overlay">
        <div class="loading-spinner"></div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import { supabase } from '@/supabase';
  import ImageUploader from '@/Components/ImageUploader.vue';
  
  export default {
    components: {
      ImageUploader
    },
    props: {
      newsItem: {
        type: Object,
        default: null
      }
    },
    setup(props) {
      const form = ref({
        id: null,
        title: '',
        subtitle: '',
        date: '',
        image_url: null,
        description_first: '',
        description_second: ''
      });
  
      const editing = ref(false);
      const loading = ref(false);
  
      // Initialize form if editing
      onMounted(() => {
        if (props.newsItem) {
          editing.value = true;
          form.value = {
            id: props.newsItem.id,
            title: props.newsItem.title,
            subtitle: props.newsItem.subtitle || '',
            date: props.newsItem.date || '',
            image_url: props.newsItem.image_url || null,
            description_first: props.newsItem.description_first || '',
            description_second: props.newsItem.description_second || ''
          };
        }
      });
  
      const handleImageUpload = (imageUrl) => {
        form.value.image_url = imageUrl;
      };
  
      const handleImageRemove = () => {
        form.value.image_url = null;
      };
  
      const submitForm = async () => {
        loading.value = true;
        try {
          const newsData = {
            title: form.value.title,
            subtitle: form.value.subtitle,
            date: form.value.date,
            description_first: form.value.description_first,
            description_second: form.value.description_second,
            updated_at: new Date().toISOString()
          };
  
          // Only include image_url if it exists
          if (form.value.image_url) {
            newsData.image_url = form.value.image_url;
          }
  
          if (editing.value) {
            // Update existing news
            const { error } = await supabase
              .from('news')
              .update(newsData)
              .eq('id', form.value.id);
  
            if (error) throw error;
          } else {
            // Create new news
            newsData.created_at = new Date().toISOString();
            const { data, error } = await supabase
              .from('news')
              .insert([newsData])
              .select();
  
            if (error) throw error;
            form.value.id = data[0].id;
            editing.value = true;
          }
  
          emit('saved', form.value);
        } catch (error) {
          console.error('Error saving news:', error);
          alert('Failed to save news. Please try again.');
        } finally {
          loading.value = false;
        }
      };
  
      const cancelEdit = () => {
        emit('cancel');
      };
  
      return {
        form,
        editing,
        loading,
        handleImageUpload,
        handleImageRemove,
        submitForm,
        cancelEdit
      };
    }
  };
  </script>
  
  <style scoped>
  .news-resource {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #2d2d2d;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }
  
  h2 {
    color: #ffc851;
    font-family: 'Molot', sans-serif;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
    color: #ffffff;
    font-family: 'Lexend', sans-serif;
  }
  
  input[type="text"],
  input[type="date"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #444;
    border-radius: 4px;
    background-color: #3a3a3a;
    color: #ffffff;
    font-family: 'Lexend', sans-serif;
  }
  
  textarea {
    min-height: 100px;
    resize: vertical;
  }
  
  .form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 30px;
  }
  
  .submit-btn {
    background-color: #ffc851;
    color: #1a1a1a;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Lexend', sans-serif;
    font-weight: bold;
    transition: background-color 0.3s;
  }
  
  .submit-btn:hover {
    background-color: #e6b447;
  }
  
  .cancel-btn {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Lexend', sans-serif;
    transition: background-color 0.3s;
  }
  
  .cancel-btn:hover {
    background-color: #5a6268;
  }
  
  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .loading-spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #ffc851;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  @media (max-width: 768px) {
    .news-resource {
      padding: 15px;
    }
    
    .form-actions {
      flex-direction: column;
    }
    
    .submit-btn,
    .cancel-btn {
      width: 100%;
    }
  }
  </style>