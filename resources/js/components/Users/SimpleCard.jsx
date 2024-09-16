import React from "react"

const SimpleCard = ({ className, ...user }) => {
  return <>
    <div className={`px-4 flex items-center gap-2 py-3 text-sm text-gray-900 rounded border shadow ${className}`}>
      <img
        className='h-10 w-10 flex-shrink-0 object-cover object-center rounded-full'
        src={`/storage/${user?.profile_photo_path}`}
        alt={`Perfil de ${user?.name} ${user?.lastname || ''}`}
        onError={(e) => e.target.src = `https://ui-avatars.com/api/?name=${user?.name}+${user?.lastname || ''}&color=7F9CF5&background=EBF4FF`}
      />
      <div className='min-w-0 flex-1'>
        <div className="font-medium truncate">
          {user?.name} {user?.lastname || ''}
        </div>
        <div className='truncate text-gray-500'>
          {user?.email}
        </div>
      </div>
    </div>
  </>
}

export default SimpleCard