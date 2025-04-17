<template>
    <div class="image-uploader">
      <input 
        type="file" 
        ref="fileInput" 
        accept="image/*" 
        @change="handleFileChange"
        style="display: none"
      >
      <button @click="triggerFileInput" class="upload-button">
        {{ buttonText }}
      </button>
      <div v-if="imageUrl" class="image-preview">
        <img :src="imageUrl" alt="Preview">
        <button @click="removeImage" class="remove-button">×</button>
      </div>
      <div v-if="uploadProgress > 0 && uploadProgress < 100" class="progress-bar">
        <div class="progress" :style="{ width: uploadProgress + '%' }"></div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import axios from 'axios';
  
  export default {
    props: {
      newsId: {
        type: Number,
        default: null
      },
      initialImage: {
        type: String,
        default: null
      },
      buttonText: {
        type: String,
        default: 'Upload Image'
      }
    },
    setup(props) {
      const fileInput = ref(null);
      const imageUrl = ref(props.initialImage);
      const uploadProgress = ref(0);
  
      const triggerFileInput = () => {
        fileInput.value.click();
      };
  
      const handleFileChange = async (event) => {
        const file = event.target.files[0];
        if (!file) return;
  
        const formData = new FormData();
        formData.append('image', file);
        if (props.newsId) {
          formData.append('news_id', props.newsId);
        }
  
        try {
            const response = await axios.post('/upload-image', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: (progressEvent) => {
                    uploadProgress.value = Math.round(
                        (progressEvent.loaded * 100) / progressEvent.total
                    );
                }
            });

            imageUrl.value = response.data.url;
          uploadProgress.value = 0;
          emit('upload-success', response.data.url);
        } catch (error) {
          console.error('Upload failed:', error);
          uploadProgress.value = 0;
          emit('upload-error', error);
        }
      };
  
      const removeImage = () => {
        imageUrl.value = null;
        emit('image-removed');
      };
  
      return {
        fileInput,
        imageUrl,
        uploadProgress,
        triggerFileInput,
        handleFileChange,
        removeImage
      };
    }
  };
  </script>
  
  <style scoped>
  .image-uploader {
    margin: 20px 0;
  }
  
  .upload-button {
    background-color: #ffc851;
    color: #1a1a1a;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Lexend', sans-serif;
    transition: background-color 0.3s;
  }
  
  .upload-button:hover {
    background-color: #e6b447;
  }
  
  .image-preview {
    position: relative;
    margin-top: 15px;
    max-width: 300px;
  }
  
  .image-preview img {
    width: 100%;
    border-radius: 4px;
  }
  
  .remove-button {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: #ff6b6b;
    color: white;
    border: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .progress-bar {
    width: 100%;
    height: 5px;
    background-color: #ddd;
    margin-top: 10px;
    border-radius: 5px;
    overflow: hidden;
  }
  
  .progress {
    height: 100%;
    background-color: #ffc851;
    transition: width 0.3s;
  }
  </style>