const { validationResult } = require('express-validator');
const postModel = require('../models/postModel')
const categoryModel = require('../models/categoryModel')
const userModel = require('../models/userModel')
const jwt = require('jsonwebtoken')


//addPost
const addPost = async (req, res) => {
  let categories = await categoryModel.find();
  return res.render('admin/add-post', { categories, errors:[]})
}


const createPost = async (req, res) => {

  try {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
  let categories = await categoryModel.find({});
      return res.status(400).render('admin/add-post', {errors: errors.array(), categories})
      }
    const { title, description, categoryId,status } = req.body;
    
    const image = req.file?.filename;
    const token = req.cookies.token;
    if (token) {
      let decode = jwt.verify(token, process.env.JWT_KEY)
    
      const user = await userModel.findById(decode.id)
      const postStatus = (status === 'Publish')?true:false;
      
      const newPost = await postModel.create({
        title, description,
        category: categoryId,
        user: user.id,
        image, status:postStatus
      });
      
      
      return res.redirect('/admin/post')
    }

  } catch (err) {
    res.status(400).json({ error: 'Failed to create post', details: err.message });
  }

}

// read all posts
const allPost = async (req, res) => {
  const { page = 1, limit = 5 } = req.query;
  const offset = (page-1)*limit;
  try {
    let posts = [
      {
        $lookup: {
          from: 'categories',
          localField: 'category',
          foreignField: '_id',
          as: 'category'
        }
      },
      {
        $lookup: {
          from: 'users',
          localField: 'user',
          foreignField: '_id',
          as: 'user'
        }
      },
      {
        $unwind: {
          path: '$category'
          }
      },
      { 
        $unwind: {
          path:'$user' 
        }
      },
      {
        $addFields: {
          formattedDate: {
            $dateToString: {
              format: '%d-%m-%Y',
              date: '$date'
            }
          }
        }
      },
      {
        $project: {
          title: 1,
          description: 1,
          formattedDate: -1,
          category: 1,
          user:1,
          status:1,
        }
      },

    ]
    const options = {
      page: parseInt(page || 1),  
      limit: parseInt(limit || 10),
    } 
    const result = await postModel.aggregatePaginate(posts, options)
    return res.render('admin/post', { 
      posts:result.docs,
      currentPage : result.page,
      totalPages : result.totalPages,
      limit: result.limit,offset
    })
  } catch (err) {
    res.send(err.message)
  }

}



//single user
const editPost = async (req, res) => { 
  let categories = await categoryModel.find({})
  let post = await postModel.findById({_id:req.params.id})
  if (!post) {
   return res.send('Post not found')
  } else {
    return res.render('admin/update-post', { post, categories,  })
  }
}

// update
const updatePost = async (req, res) => {

  try {
    
    const { title, description, category, status } = req.body;
    const image = req.file?.filename
  
    let decode = jwt.verify(req.cookies.token, process.env.JWT_KEY)
    const user = await userModel.findById({_id:decode.id})
    const postStatus = (status === 'Update')?`true` : false;

    const updatedPost = await postModel.findByIdAndUpdate(req.params.id, { title, description, category, image, user:user._id, status:postStatus}, { new: true })

    if (!updatedPost) return res.status(404).json({ error: 'Post not found' });

   
   
    return res.redirect('/admin/post')
  } catch (err) {
    return res.status(400).json({ error: 'Failed to update post', details: err.message });
  }
}

// delete
const deletePost = async (req, res) => {
  let { title, image, description, category } = req.body;

  let user = await postModel.findByIdAndDelete(req.params.id, { title, image, description, category })
  if (!user) {
    return res.send('Post not found')
  } else {
    return res.redirect('/admin/post')
  }
}

module.exports = { allPost, addPost, createPost, editPost, updatePost, deletePost, }